<?php
class Coleta {
    public $id;
    public $residuo_id;
    public $ecoponto_id;
    public $data_solicitacao;

    public function __construct($id, $residuo_id, $ecoponto_id, $data_solicitacao) {
        $this->id = $id;
        $this->residuo_id = $residuo_id;
        $this->ecoponto_id = $ecoponto_id;
        $this->data_solicitacao = $data_solicitacao;
    }
}
?>
