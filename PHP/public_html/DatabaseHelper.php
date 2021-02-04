<?php

class DatabaseHelper {

    const username = '***';   // use a + your matriculation number
    const password = '***';       // use your oracle db password
    const con_string = 'oracle-lab.cs.univie.ac.at:1521/lab';

    protected $conn;

    // Create connection in the constructor
    public function __construct() {
        try {
            $this->conn = @oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            // check if the connection object is null
            if (!$this->conn) {
                die("DB error: Connection can't be established!");
            }
        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    // Used to clean up
    public function __destruct() {
        @oci_close($this->conn);
    } 



// INSERTS
// defined sql statements get parsed and executed on the connected database
// instant commit ensures data consistency and prevents NOWAIT

    // Muskel
    public function insertIntoMuskel($bezeichnung, $mv) {
        $sql = "INSERT INTO muskel (bezeichnung, mv) VALUES ('{$bezeichnung}', '{$mv}')";
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

    // Gerät
    public function insertIntoGeraet($firma, $nummer, $name, $kosten, $plz, $strasse, $land) {
        $sql = "INSERT INTO geraet VALUES ('{$firma}', '{$nummer}', '{$name}', '{$kosten}', '{$plz}', '{$strasse}', '{$land}')";
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

    // Trainingspartner
    public function insertIntoTP($svnr1, $svnr2) {
        $sql = "INSERT INTO trainingspartner VALUES ('{$svnr1}', '{$svnr2}')";
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

    // Training
    public function insertIntoTraining($svnr, $plz, $strasse, $land, $tid, $sessions) {
        if($tid) { $sql = "INSERT INTO training VALUES ('{$svnr}', '{$plz}', '{$strasse}', '{$land}', '{$tid}', '{$sessions}')"; }                           // with trainer
        else { $sql = "INSERT INTO training(svnr,plz,strasse,land,sessions_woche) VALUES ('{$svnr}', '{$plz}', '{$strasse}', '{$land}', '{$sessions}')"; }   // without trainer
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

    // konditioniert
    public function insertIntoKonditioniert($mid, $firma, $nummer, $name) {
        $sql = "INSERT INTO konditioniert VALUES ('{$mid}', '{$firma}', '{$nummer}', '{$name}')";
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }



// SELECTS
// same logic as inserts

    // Muskel all or by bezeichnung
    public function selectMuskel($bezeichnung) {
        if(!$bezeichnung) { $sql = "SELECT * FROM muskel ORDER BY m_id"; }                   // select all if no argument is passed
        else { $sql = "SELECT * FROM muskel WHERE bezeichnung LIKE '{$bezeichnung}'"; }      // otherwise select for argument
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);

        return $res;
    }

    // Muskel by MV
    public function selectMuskelMv($mv, $action) {
        if($action == "gt") { $sql = "SELECT * FROM muskel WHERE mv>=$mv ORDER BY mv"; }                  
        else { $sql = "SELECT * FROM muskel WHERE mv<=$mv ORDER BY mv"; }      
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Trainee all
    public function selectAllTrainee() {
        $sql = "SELECT * FROM trainee ORDER BY sp_name";  
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Trainer all
    public function selectAllTrainer() {
        $sql = "SELECT * FROM trainer ORDER BY sp_name";  
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Studio all
    public function selectAllStudio() {
        $sql = "SELECT * FROM studio ORDER BY st_name";  
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Trainingspartner by SVNr
    public function selectTP($svnr) {
        $sql = "SELECT * FROM trainingspartner WHERE svnr1 LIKE '{$svnr}' OR svnr2 LIKE '{$svnr}'";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Training all
    public function selectAllTraining() {
        $sql = "SELECT * FROM training";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Training by land
    public function selectTrainingLand($land) {
        $sql = "SELECT * FROM training WHERE land='$land' ORDER BY plz";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Uebung all
    public function selectAllUebung() {
        $sql = "SELECT * FROM uebung ORDER BY seriennr";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Geraet all
    public function selectAllGeraet() {
        $sql = "SELECT * FROM geraet ORDER BY seriennr";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Geraet by firma
    public function selectGeraetFirma($firma) {
        $sql = "SELECT * FROM geraet WHERE firma='$firma' ORDER BY seriennr";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // Geraet by studio
    public function selectGeraetStudio($plz, $strasse, $land) {
        $sql = "SELECT * FROM geraet WHERE plz=$plz AND strasse='$strasse' AND land='$land'";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);

        return $res;
    }

    // konditioniert all
    public function selectAllKond() {
        $sql = "SELECT * FROM konditioniert ORDER BY m_id";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }

    // konditioniert by uebung name
    public function selectKondName($name) {
        $sql = "SELECT * FROM konditioniert WHERE ue_name='$name' ORDER BY m_id";
        $statement = @oci_parse($this->conn, $sql);
        @oci_execute($statement);
        @oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);
        @oci_free_statement($statement);
        return $res;
    }



// UPDATES
// updates attributes for given primary key

    // Muskel
    public function updateMuskel($mid, $bezeichnung, $mv){
        $sql="UPDATE muskel SET bezeichnung='$bezeichnung', mv='$mv' WHERE m_id='$mid'";    // update specific mid with new bezeichnung and mv
        $statement = @oci_parse($this->conn, $sql);
        $update= @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $update;
    }
    
    // Training with or without Trainer
    public function updateTraining($svnr, $plz, $strasse, $land, $tid, $sessions){
        if($tid) { $sql="UPDATE training SET sessions_woche=$sessions WHERE svnr=$svnr AND plz=$plz AND strasse='$strasse' AND land='$land' AND t_id=$tid"; }    // with tid
        else { $sql="UPDATE training SET sessions_woche=$sessions WHERE svnr=$svnr AND plz=$plz AND strasse='$strasse' AND land='$land'"; }                      // without tid
        $statement = oci_parse($this->conn, $sql);
        $update= oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $update;
    }

    // Geraet 
    public function updateGeraet($firma, $seriennr, $name, $kosten, $plz, $strasse, $land){
        $sql="UPDATE geraet SET g_name='$name', g_kosten=$kosten WHERE firma='$firma' AND seriennr=$seriennr AND plz=$plz AND strasse='$strasse' AND land='$land'";     // new name and kosten
        $statement = oci_parse($this->conn, $sql);
        $update= oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $update;
    }


// DELETE PROCEDURE
// calls SQL procedure to delete muskel -> error code 1 = OK

    // Muskel
    public function deleteMuskel($mid) {
        $errorcode = 0;
        $sql = 'BEGIN DELETE_MUSKEL(:mid, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        //  Bind the parameters
        @oci_bind_by_name($statement, ':mid', $mid);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        @oci_execute($statement);
        @oci_free_statement($statement);
        return $errorcode;
    }

// DELETE CONVENTIONAL
// same logic as inserts

    // Trainingspartner
    public function deleteTP($svnr1, $svnr2){
        $sql = "DELETE FROM trainingspartner WHERE svnr1=$svnr1 AND svnr2=$svnr2";
        $statement = @oci_parse($this->conn, $sql);
        $delete = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $delete;
    }

    // Training
    public function deleteTraining($svnr, $plz, $strasse, $land, $tid){
        if($tid) { $sql = "DELETE FROM training WHERE svnr=$svnr AND plz=$plz AND strasse='$strasse' AND land='$land' AND t_id=$tid"; }
        else { $sql = "DELETE FROM training WHERE svnr=$svnr AND plz=$plz AND strasse='$strasse' AND land='$land'"; }
        $statement = @oci_parse($this->conn, $sql);
        $delete = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $delete;
    }

    // Geraet
    public function deleteGeraet($firma, $seriennr, $plz, $strasse, $land){
        $sql = "DELETE FROM geraet WHERE firma='$firma' AND seriennr=$seriennr AND plz=$plz AND strasse='$strasse' AND land='$land'";
        $statement = @oci_parse($this->conn, $sql);
        $delete = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $delete;
    }

    // konditioniert
    public function deleteKond($mid, $firma, $nummer, $name){
        $sql = "DELETE FROM konditioniert WHERE m_id=$mid AND firma='$firma' AND seriennr=$nummer AND ue_name='$name'";
        $statement = @oci_parse($this->conn, $sql);
        $delete = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $delete;
    }

} 
?>
