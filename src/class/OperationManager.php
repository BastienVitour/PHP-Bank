<?php

class OperationManager {
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	public function insertBankOp(Operation $operation, $operation_name) {
		$stmh = $this->db->prepare('INSERT INTO '.$operation_name.'(id_bank_account, value, admin_id, status) VALUES(?, ?, ?, ?)');
		$stmh->execute([
			$operation->id_bank_account, $operation->value, $operation->admin_id, $operation->status
		]);
		return $this->db->lastInsertId();
	}

    public function insertUserOp(Operation $operation) {
		$stmh = $this->db->prepare('INSERT INTO transactions(sender_account, receiver_account, value, id_currencies, status) VALUES(?, ?, ?, ? ,?)');
		$stmh->execute([
			$operation->id_bank_account, $operation->receiver_account, $operation->value, $operation->id_currencies, $operation->status
		]);
		return $this->db->lastInsertId();
	}

    public function deposit($user_id, $value) {
        $stmh = $this->db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
        $stmh->execute([$user_id]);
        $utilisateur = $stmh->fetch();

        $money_usr = intval($value);
        $new_money = $utilisateur['money'] + $money_usr;

        $stmh = $this->db->prepare('UPDATE bankaccounts SET money = ? WHERE id = ?');
        $stmh->execute([$new_money, $utilisateur['id']]);

    }

    public function withdraw($user_id, $value) {
        $stmh = $this->db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
        $stmh->execute([$user_id]);
        $utilisateur = $stmh->fetch();

        $money_usr = intval($value);
        $new_money = $utilisateur['money'] - $money_usr;

        $stmh = $this->db->prepare('UPDATE bankaccounts SET money = ? WHERE id = ?');
        $stmh->execute([$new_money, $utilisateur['id']]);
    }

    public function transaction($sender_id, $receiver_id, $value) {
        $this->withdraw($sender_id, $value);
        $this->deposit($receiver_id, $value);
    }

}
