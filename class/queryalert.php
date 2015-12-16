<?php
include 'connection.php';
class Queryalert extends Connection {

    public function __construct(){
        parent::__construct();
    }
    public function getData(){
        $result = pg_query($this->con,"SELECT * FROM crosstab(
        $$ SELECT (b.provincia||'.'||b.distrito), a.nivel,a.nivel
          FROM aviso88_2015  a, geo.distrito b
          WHERE st_intersects(a.the_geom,transform(b.the_geom,4326)) = 't' order by provincia, distrito, nivel; $$,
        $$ SELECT ('Nivel'||' '||c.nro):: CHARACTER VARYING AS nivel
         FROM generate_series(1, 4) AS c(nro) $$
        ) AS (nombre TEXT, \"nivel1\" TEXT, \"nivel2\" TEXT, \"nivel3\" TEXT, \"nivel4\" TEXT);");
        if (!$result) {
            echo "An error occured.\n";
            exit;
        }        
        return pg_fetch_all($result);
    }
    
}

       
       
       
       
       
       
      