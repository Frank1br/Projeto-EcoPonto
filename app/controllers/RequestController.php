<?php
require_once(__DIR__ . '/../../config/db_config.php');

class RequestController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createRequest($user_name, $residue_id, $ecopoint_id, $request_date)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO collection_requests (user_name, residue_id, ecopoint_id, request_date)
            VALUES (?, ?, ?, ?)
        ");

        if (!$stmt) {
            return ["success" => false, "message" => "Erro na preparação da consulta: " . $this->conn->error];
        }

        $stmt->bind_param("siis", $user_name, $residue_id, $ecopoint_id, $request_date);

        if ($stmt->execute()) {
            return ["success" => true, "message" => "Solicitação registrada com sucesso!"];
        } else {
            return ["success" => false, "message" => "Erro ao registrar: " . $stmt->error];
        }

        $stmt->close();
    }

    public function getAllRequests()
    {
        $sql = "SELECT * FROM collection_requests";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $requests = [];
            while ($row = $result->fetch_assoc()) {
                $requests[] = $row;
            }
            return $requests;
        } else {
            return [];
        }
    }
}
?>
