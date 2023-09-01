<?php 
  Class ReservaDAO{

    public function __construct( private $conexao){}

    //função inserir reserva na agenda Usuario
    public function insertReserva($reserva)
    {
     
     $sql = "INSERT INTO reserva (DataReserva, HoraReserva,idServico, idUsuario, idPrestador, Situacao )
                  VALUE (?,?,?,?,?,?) ";
      try
			{
				$stm = $this->conexao->prepare($sql);				
				$stm->bindValue(1, $reserva->getDataReserva());
				$stm->bindValue(2, $reserva->getHoraReserva());
				$stm->bindValue(3, $reserva->getServico()->getIdServico());    
				$stm->bindValue(4, $reserva->getUsuario()->getIdUsuario());
				$stm->bindValue(5, $reserva->getPrestador()->getIdPrestador());
				$stm->bindValue(6, $reserva->getSituacao());
				
				$stm->execute();
				$this->conexao = null;
				return "Reserva efetuada com sucesso!";
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return $e->getMessage();
			}    
    
    }
    //função listar as reservas do Usuario 
    public function listReserva($reserva)
    {
      try {
       
        $sql = "SELECT r.*, r.Situacao as situacao, p.*, s.* FROM  reserva as r, prestador as p, servico as s WHERE r.idPrestador = p.idPrestador AND r.idServico = s.idServico AND r.idUsuario = ? AND r.Situacao = ? ORDER BY r.DataReserva AND r.HoraReserva";
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $reserva->getUsuario()->getIdUsuario());
			   $stm->bindValue(2, $reserva->getSituacao());
			  $stm->execute();
			  $this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);

      } catch (PDOException $e) {
        $this->conexao = null;
				return "Problema ao verificar agenda por idUsuario";
				
      }

    }
    
    //função listar todas as reservas p/ Prestador
    public function listReservaPrestador($reserva)
    {
      try {
       
        $sql = "SELECT *
                FROM reserva
                INNER JOIN usuario ON reserva.idUsuario = usuario.idUsuario
                INNER JOIN servico ON reserva.idServico = servico.idServico
                WHERE reserva.Situacao ='Ativo' AND reserva.idPrestador = ?
                ORDER BY reserva.DataReserva";

        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $reserva->getPrestador()->getIdPrestador());			 
			  $stm->execute();
			  $this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);

      } catch (PDOException $e) {
        $this->conexao = null;
				return "Problema ao verificar agenda do prestador";
				
      }
    }

    //função para listar todas as reservas do Prestador do dia
    public function selectReservaDia($reserva)
    {
      $sql = "SELECT *
              FROM reserva
              INNER JOIN usuario ON reserva.idUsuario = usuario.idUsuario
              INNER JOIN servico ON reserva.idServico = servico.idServico
              WHERE reserva.idPrestador = ?
              AND DATE(reserva.DataReserva) = CURDATE()
              AND reserva.Situacao = 'Ativo' ORDER BY HoraReserva";
      try
      {        
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $reserva->getPrestador());			 
			  $stm->execute();
			  $this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);

      } catch (PDOException $e) {
        $this->conexao = null;
				return "Problema ao verificar agenda do prestador";
				
      }

    }   

    //função listar todas as reservas pelo idReserva
    public function getReserva($reserva)
    {
      try {
        $sql = "SELECT r.*, p.*, s.* FROM  reserva as r, prestador as p, servico as s WHERE r.idPrestador = p.idPrestador AND r.idServico = s.idServico AND r.idReserva = ?";
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $reserva->getIdReserva());
			  $stm->execute();
			  $this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);
        
      } catch (PDOException $e) {
        $this->conexao = null;
				return "Problema ao verificar agenda por idUsuario";
      }
    }

    //função cancelar a reserva 
    public function deletReserva($reserva){
      $sql = "UPDATE reserva SET Situacao=? WHERE idReserva=?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $reserva->getSituacao());
				$stm->bindValue(2, $reserva->getIdReserva());
				$stm->execute();
				$this->conexao = null;
				return "Reserva Cancelada com sucesso!";
			}
			catch(PDOException $e)
			{
				return "Erro! Problema ao cancelar a reserva, verifique!";
			}
    
    }

    //função selecionar horarios da agenda por data e idPrestador
    public function getHorarios($idReserva, $data, $idPrestador)
    {
      try {
        $sql = "SELECT HoraReserva FROM `reserva` WHERE idReserva != ?
                AND idPrestador = ? AND DataReserva = ?";                
                
        $stm = $this->conexao->prepare($sql);
			  $stm->bindValue(1, $idReserva);
        $stm->bindValue(2, $idPrestador);
        $stm->bindValue(3, $data);
			  $stm->execute();
			  //$this->conexao = null;
			  return $stm->fetchAll(PDO::FETCH_OBJ);
        
      } catch (\Throwable $th) {
        $this->conexao = null;
				return "Problema ao verificar agenda por idUsuario";
      }
    }

    //função selecionar Agenda por dataReserva e situação=ativa
    public function buscarAgendaData($reserva)    
    {
      $sql = "SELECT * FROM reserva WHERE DataReserva = ? AND idPrestador = ? AND Situacao = ?";
      try{
                
        $stm = $this->conexao->prepare($sql);
		    $stm->bindValue(1, $reserva->getDataReserva());
        $stm->bindValue(2, $reserva->getPrestador()->getIdPrestador());
        $stm->bindValue(3, $reserva->getSituacao());
        $stm->execute();
        $this->conexao = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);


      }catch(PDOException $e){
        $this->conexao = null;
        return "Erro! ";
      }
      
    }

    
   
   }
?>