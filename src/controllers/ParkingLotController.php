<?php

namespace App\Controllers;

use App\Models\Database;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ParkingLotController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // Get parking lot by ID
    public function getById(Request $request, Response $response, $args): Response
    {
        $id = $args['id'];
        $sql = "SELECT * FROM ParkingLot WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            $response->getBody()->write(json_encode($result));
        } else {
            $response->getBody()->write(json_encode(['message' => 'Parking lot not found']));
        }

        return $response->withHeader('Content-Type', 'application/json');
    }

    // Get all parking lots
    public function getAll(Request $request, Response $response): Response
    {
        $sql = "SELECT * FROM ParkingLot";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
