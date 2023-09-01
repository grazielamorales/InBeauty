<?php 
    Class Reserva{
        public function __construct(
            private $idReserva = 0,
            private $DataReserva = "",
            private $HoraReserva = "",
            private $Servico = null,           
            private $usuario = null,
            private $prestador = null,
            private $Situacao = ""
          
        )
        {}        
        


            /**
             * Get the value of idReserva
             */
            public function getIdReserva()
            {
                        return $this->idReserva;
            }

            /**
             * Set the value of idReserva
             */
            public function setIdReserva($idReserva)
            {
                        $this->idReserva = $idReserva;

                        return $this;
            }

            /**
             * Get the value of DatatReserva
             */
            public function getDataReserva()
            {
                        return $this->DataReserva;
            }

            /**
             * Set the value of DatatReserva
             */
            public function setDataReserva($DataReserva)
            {
                        $this->DataReserva = $DataReserva;

                        return $this;
            }

            /**
             * Get the value of HoraReserva
             */
            public function getHoraReserva()
            {
                        return $this->HoraReserva;
            }

            /**
             * Set the value of HoraReserva
             */
            public function setHoraReserva($HoraReserva)
            {
                        $this->HoraReserva = $HoraReserva;

                        return $this;
            }

            /**
             * Get the value of Servico
             */
            public function getServico()
            {
                        return $this->Servico;
            }

            /**
             * Set the value of Servico
             */
            public function setServico($Servico)
            {
                        $this->Servico = $Servico;

                        return $this;
            }

            /**
             * Get the value of idUsuario
             */
            public function getUsuario()
            {
                        return $this->usuario;
            }

            /**
             * Set the value of idUsuario
             */
            public function setIdUsuario($usuario)
            {
                        $this->usuario = $usuario;

                        return $this;
            }

            /**
             * Get the value of idPrestador
             */
            public function getPrestador()
            {
                        return $this->prestador;
            }

            /**
             * Set the value of idPrestador
             */
            public function setPrestador($prestador)
            {
                        $this->prestador = $prestador;

                        return $this;
            }

            /**
             * Get the value of Status
             */
            public function getSituacao()
            {
                        return $this->Situacao;
            }

            /**
             * Set the value of Status
             */
            public function setSituacao($Situacao)
            {
                        $this->Situacao = $Situacao;

                        return $this;
            }
     }  
          
?>