<?php
class Datbase
{
    private $host = 'mysql:dbname=ajax_crud';
    private $user = "root";
    private $pswd = "";

    private function getConnexion()
    {
        try {
            return new PDO($this->host, $this->user, $this->pswd);
        } catch (PDOException $e) {
            die('Erreur' . $e->getMessage());
        }
    }

    public function create(string $customer, string $cashier, int $amount, int $received, int $returned, string $state)
    {
        $q = $this->getConnexion()->prepare(statement: "INSERT INTO factures
             (customer,cashier,amount,received,returned,state) VALUES 
             (:customer, :cashier, :amount, :received, :returned, :state)");
        return $q->execute([
            'customer'->$customer,
            'cashier'->$cashier,
            'amount'->$amount,
            'received'->$received,
            'returned'->$returned,
            'state'->$state,
        ]);
    }
}
?>