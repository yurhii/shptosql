<?php
include 'connection.php';
class Queryalert extends Connection {

    public function __construct(){
        parent::__construct();
    }
    
    public function getLevelLocality($locality, $alert){
        // 1 = PROVINCIAL AND 2 == DISTRITAL
        if($locality == 1){
            $result = pg_query($this->con,"SELECT * FROM crosstab(
            $$ SELECT (b.provincia), a.nivel,a.nivel
            FROM alerta.$alert a, geo.provincia b
            WHERE st_intersects(a.the_geom,transform(b.the_geom,4326)) = 't' order by provincia, nivel; $$,
            $$ SELECT ('Nivel'||' '||c.nro):: CHARACTER VARYING AS nivel
             FROM generate_series(1, 4) AS c(nro) $$
            ) AS (nombre TEXT, \"nivel1\" TEXT, \"nivel2\" TEXT, \"nivel3\" TEXT, \"nivel4\" TEXT);");
        }else{
            if($locality == 2){
                $result = pg_query($this->con,"SELECT * FROM crosstab(
                $$ SELECT (b.provincia||'.'||b.distrito), a.nivel,a.nivel
                  FROM alerta.$alert  a, geo.distrito b
                  WHERE st_intersects(a.the_geom,transform(b.the_geom,4326)) = 't' order by provincia, distrito, nivel; $$,
                $$ SELECT ('Nivel'||' '||c.nro):: CHARACTER VARYING AS nivel
                 FROM generate_series(1, 4) AS c(nro) $$
                ) AS (nombre TEXT, \"nivel1\" TEXT, \"nivel2\" TEXT, \"nivel3\" TEXT, \"nivel4\" TEXT);");
            }
        }
        if (!$result) {
            echo "An error occured.\n";
            exit;
        }
        return pg_fetch_all($result);
    }
    public function getAlertas(){
        $result = pg_query($this->con,"SELECT * FROM alerta.siaralerta ORDER BY ale_id DESC;");
        if (!$result) {
            echo "An error occured.\n";
            exit;
        }       
        return pg_fetch_all($result);
    }
    public function getLevelMain(){
        
        $resultNameAle = pg_query($this->con,"SELECT ale_nombre
                        FROM alerta.siaralerta
                        WHERE ale_id = ( SELECT MAX(ale_id) FROM alerta.siaralerta );");
        $dataName = pg_fetch_all($resultNameAle);
        foreach ($dataName as $value) {
            $nameAle = $value['ale_nombre'];
        }
        
        $result = pg_query($this->con,"SELECT * FROM crosstab(
                $$ SELECT (b.provincia||'.'||b.distrito), a.nivel,a.nivel
                  FROM alerta.$nameAle  a, geo.distrito b
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
    public function getLevelLoc($loc){
        $resultNameAle = pg_query($this->con,"SELECT ale_nombre
                        FROM alerta.siaralerta
                        WHERE ale_id = ( SELECT MAX(ale_id) FROM alerta.siaralerta );");
        $dataName = pg_fetch_all($resultNameAle);
        foreach ($dataName as $value) {
            $nameAle = $value['ale_nombre'];
        }
        
        if($loc == 'Provincia'){
            $result = pg_query($this->con,"SELECT * FROM crosstab(
            $$ SELECT (b.provincia), a.nivel,a.nivel
            FROM alerta.$nameAle a, geo.provincia b
            WHERE st_intersects(a.the_geom,transform(b.the_geom,4326)) = 't' order by provincia, nivel; $$,
            $$ SELECT ('Nivel'||' '||c.nro):: CHARACTER VARYING AS nivel
             FROM generate_series(1, 4) AS c(nro) $$
            ) AS (nombre TEXT, \"nivel1\" TEXT, \"nivel2\" TEXT, \"nivel3\" TEXT, \"nivel4\" TEXT);");
        }else{
            if($loc == 'Distrital'){
                $result = pg_query($this->con,"SELECT * FROM crosstab(
                $$ SELECT (b.provincia||'.'||b.distrito), a.nivel,a.nivel
                  FROM alerta.$nameAle  a, geo.distrito b
                  WHERE st_intersects(a.the_geom,transform(b.the_geom,4326)) = 't' order by provincia, distrito, nivel; $$,
                $$ SELECT ('Nivel'||' '||c.nro):: CHARACTER VARYING AS nivel
                 FROM generate_series(1, 4) AS c(nro) $$
                ) AS (nombre TEXT, \"nivel1\" TEXT, \"nivel2\" TEXT, \"nivel3\" TEXT, \"nivel4\" TEXT);");
            }
        }
        if (!$result) {
            echo "An error occured.\n";
            exit;
        }
        return pg_fetch_all($result);
    }
    public function levelProvincia($pro){
        $resultNameAle = pg_query($this->con,"SELECT ale_nombre
                        FROM alerta.siaralerta
                        WHERE ale_id = ( SELECT MAX(ale_id) FROM alerta.siaralerta );");
        $dataName = pg_fetch_all($resultNameAle);
        foreach ($dataName as $value) {
            $nameAle = $value['ale_nombre'];
        }        
        $result = pg_query($this->con,"SELECT * FROM crosstab(
                $$ SELECT (b.provincia||'.'||b.distrito), a.nivel,a.nivel
                  FROM alerta.$nameAle  a, geo.distrito b
                  WHERE st_intersects(a.the_geom,transform(b.the_geom,4326)) = 't' and b.provincia = '$pro' order by provincia, distrito, nivel; $$,
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

       
       
       
       
       
       
      