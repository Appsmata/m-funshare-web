<?php

class AS_Dbconn {
    private $link;
    public $filter;
    
    public function log_db_errors( $error, $query )
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: Admin <'.SEND_ERRORS_TO.'>' . "\r\n";
        $headers .= 'From: Dekings <info@dekings.com>' . "\r\n";
    
        $message = '<p>Error at '. date('Y-m-d H:i:s').':</p>';
        $message .= '<p>Query: '. htmlentities( $query ).'<br />';
        $message .= 'Error: ' . $error;
        $message .= '</p>';

        mail( SEND_ERRORS_TO, 'Database Error', $message, $headers);

        if( DISPLAY_DEBUG )
        {
            echo $message;   
        }
    }
    
    
	public function __construct()
	{
	    global $connection;
		mb_internal_encoding( 'UTF-8' );
		mb_regex_encoding( 'UTF-8' );
		$this->link = new mysqli( AS_HOST, AS_USER, AS_PASS, AS_DB );
		$this->link->set_charset( "utf8" );
		
        if( $this->link->connect_errno )
        {
            $this->log_db_errors( "Connect failed", $this->link->connect_error );
			die(AS_I_TOP.'START SETTING UP THINGS'.AS_I_TOP_A.'<form action="'.AS_database_setup().'" method="post">
                        <h5>Set a few options to start you off... on: '.AS_SITEURL.'</h5><table>
             <tr><td>Database Name:</td><td><input type="text" name="database" autocomplete="off" required></td></tr>
             <tr><td>Database User:</td><td><input type="text" name="username" autocomplete="off" required></td></tr>
             <tr><td>Database Password:</td><td><input type="password" name="password" autocomplete="off" min="8"></td></tr> 
             </table><br>
              <center><input type="submit" class="submit_this" name="DatabaseSetup" value="Save Options"></center><br></form>'.AS_I_BOT);
            exit();
        }
	}
	
	public function __destruct()
	{
		$this->disconnect();
	}
	
    public function filter( $data )
    {
        if( !is_array( $data ) )
        {
            $data = trim( htmlentities( $data ) );
        	$data = $this->link->real_escape_string( $data );
        }
        else
        {
            $data = array_map( array( 'DB', 'filter' ), $data );
        }
    	return $data;
    }
    
    public function db_common( $value = '' )
    {
        if( is_array( $value ) )
        {
            foreach( $value as $v )
            {
                if( preg_match( '/AES_DECRYPT/i', $v ) || preg_match( '/AES_ENCRYPT/i', $v ) || preg_match( '/now()/i', $v ) )
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            if( preg_match( '/AES_DECRYPT/i', $value ) || preg_match( '/AES_ENCRYPT/i', $value ) || preg_match( '/now()/i', $value ) )
            {
                return true;
            }
        }
    }
    
    public function query( $query )
    {
        $full_query = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            $full_query->free();
            return false; 
        }
        else
        {
            $full_query->free();
            return true;
        }
    }
	    
    public function AS_table_exists( $name )
    {
        $check = $this->link->query("SELECT * FROM '$name' LIMIT 1");
        if( $check ) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
        
    public function AS_table_exists_create( $table,  $variables = array() ) {
        $check = $this->link->query("SELECT * FROM '$table' LIMIT 1");        
		if( $check ) return true;			
        else {
			if( empty( $variables ) ) {
				return false;
				exit;
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ". $table;
			$fields = array();
			$values = array();
			foreach( $variables as $field ) {
				$fields[] = $field; 	//$values[] = "'".$value."'";
			}
			$fields = ' (' . implode(', ', $fields) . ')';      
			$sql .= $fields;
			$query = $this->link->query( $sql );
			
			if( $this->link->error ) {
				$this->log_db_errors( $this->link->error, $sql );
				return false;
			}
			else return true;
		}
    }
		
    public function AS_num_rows( $query )
    {
        $num_rows = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return $this->link->error;
        }
        else
        {
            return $num_rows->num_rows;
        }
    }
    
    public function exists( $table = '', $check_val = '', $params = array() )
    {
        if( empty($table) || empty($check_val) || empty($params) )
        {
            return false;
            exit;
        }
        $check = array();
        foreach( $params as $field => $value )
        {
            
            if( !empty( $field ) && !empty( $value ) )
            {
                if( $this->db_common( $value ) )
                {
                    $check[] = "$field = $value";   
                }
                else
                {
                    $check[] = "$field = '$value'";   
                }
            }

        }
        $check = implode(' AND ', $check);

        $rs_check = "SELECT $check_val FROM ".$table." WHERE $check";
    	$number = $this->AS_num_rows( $rs_check );
        if( $number === 0 )
        {
            return false;
        }
        else
        {
            return true;
        }
        exit;
    }
    
    public function get_row( $query )
    {
        $row = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return false;
        }
        else
        {
            $r = $row->fetch_row();
            return $r;   
        }
    }
    
    public function get_results( $query )
    {
        $row = null;
        
        $results = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return false;
        }
        else
        {
            $row = array();
            while( $r = $results->fetch_assoc() )
            {
                $row[] = $r;
            }
            return $row;   
        }
    }
    
    public function AS_insert( $table, $variables = array() )
    {
        //Make sure the array isn't empty
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        
        $sql = "INSERT INTO ". $table;
        $fields = array();
        $values = array();
        foreach( $variables as $field => $value )
        {
            $fields[] = $field;
            $values[] = "'".$value."'";
        }
        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '('. implode(', ', $values) .')';
        
        $sql .= $fields .' VALUES '. $values;

        $query = $this->link->query( $sql );
        
        if( $this->link->error )
        {
            //return false; 
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function insert_safe( $table, $variables = array() )
    {
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        
        $sql = "INSERT INTO ". $table;
        $fields = array();
        $values = array();
        foreach( $variables as $field => $value )
        {
            $fields[] = $this->filter( $field );
            $values[] = $value; 
        }
        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '('. implode(', ', $values) .')';
        
        $sql .= $fields .' VALUES '. $values;
        $query = $this->link->query( $sql );
        
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function AS_update( $table, $variables = array(), $where = array(), $limit = '' )
    {
       
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        $sql = "UPDATE ". $table ." SET ";
        foreach( $variables as $field => $value )
        {
            
            $updates[] = "`$field` = '$value'";
        }
        $sql .= implode(', ', $updates);
        
        //Add the $where clauses as needed
        if( !empty( $where ) )
        {
            foreach( $where as $field => $value )
            {
                $value = $value;

                $clause[] = "$field = '$value'";
            }
            $sql .= ' WHERE '. implode(' AND ', $clause);   
        }
        
        if( !empty( $limit ) )
        {
            $sql .= ' LIMIT '. $limit;
        }

        $query = $this->link->query( $sql );

        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function delete( $table, $where = array(), $limit = '' )
    {
        //Delete clauses require a where param, otherwise use "truncate"
        if( empty( $where ) )
        {
            return false;
            exit;
        }
        
        $sql = "DELETE FROM ". $table;
        foreach( $where as $field => $value )
        {
            $value = $value;
            $clause[] = "$field = '$value'";
        }
        $sql .= " WHERE ". implode(' AND ', $clause);
        
        if( !empty( $limit ) )
        {
            $sql .= " LIMIT ". $limit;
        }
            
        $query = $this->link->query( $sql );

        if( $this->link->error )
        {
            //return false; //
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function lastid()
    {
        return $this->link->insert_id;
    }
    
    public function num_fields( $query )
    {
        $query = $this->link->query( $query );
        $fields = $query->field_count;
        return $fields;
    }
    
    public function list_fields( $query )
    {
        $query = $this->link->query( $query );
        $listed_fields = $query->fetch_fields();
        return $listed_fields;
    }
    
    public function truncate( $tables = array() )
    {
        if( !empty( $tables ) )
        {
            $truncated = 0;
            foreach( $tables as $table )
            {
                $truncate = "TRUNCATE TABLE `".trim($table)."`";
                $this->link->query( $truncate );
                if( !$this->link->error )
                {
                    $truncated++;
                }
            }
            return $truncated;
        }
    }
    
    public function display( $variable, $echo = true )
    {
        $out = '';
        if( !is_array( $variable ) )
        {
            $out .= $variable;
        }
        else
        {
            $out .= '<pre>';
            $out .= print_r( $variable, TRUE );
            $out .= '</pre>';
        }
        if( $echo === true )
        {
            echo $out;
        }
        else
        {
            return $out;
        }
    }
    
    public function disconnect()
    {
		$this->link->close();
	}

}