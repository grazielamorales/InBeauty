<?php
    class Prestador
    {
        public function __construct(
            private $idPrestador = 0,
            private $Nome = "",
            private $DtNasc = "",
            private $Celular = "",
            private $Email = "",
            private $Senha = "",
            private $Situacao = "",
            private $Servico = array(),
            private $Tipo = "" ){}      

          

            
           

            /**
             * Get the value of idPrestador
             */
            public function getIdPrestador()
            {
                        return $this->idPrestador;
            }

            /**
             * Set the value of idPrestador
             */
            public function setIdPrestador($idPrestador): self
            {
                        $this->idPrestador = $idPrestador;

                        return $this;
            }

            /**
             * Get the value of Nome
             */
            public function getNome()
            {
                        return $this->Nome;
            }

            /**
             * Set the value of Nome
             */
            public function setNome($Nome): self
            {
                        $this->Nome = $Nome;

                        return $this;
            }

            /**
             * Get the value of DtNasc
             */
            public function getDtNasc()
            {
                        return $this->DtNasc;
            }

            /**
             * Set the value of DtNasc
             */
            public function setDtNasc($DtNasc): self
            {
                        $this->DtNasc = $DtNasc;

                        return $this;
            }

            /**
             * Get the value of Celular
             */
            public function getCelular()
            {
                        return $this->Celular;
            }

            /**
             * Set the value of Celular
             */
            public function setCelular($Celular): self
            {
                        $this->Celular = $Celular;

                        return $this;
            }

            /**
             * Get the value of Email
             */
            public function getEmail()
            {
                        return $this->Email;
            }

            /**
             * Set the value of Email
             */
            public function setEmail($Email): self
            {
                        $this->Email = $Email;

                        return $this;
            }

            /**
             * Get the value of Senha
             */
            public function getSenha()
            {
                        return $this->Senha;
            }

            /**
             * Set the value of Senha
             */
            public function setSenha($Senha): self
            {
                        $this->Senha = $Senha;

                        return $this;
            }

            /**
             * Get the value of Situacao
             */
            public function getSituacao()
            {
                        return $this->Situacao;
            }

            /**
             * Set the value of Situacao
             */
            public function setSituacao($Situacao): self
            {
                        $this->Situacao = $Situacao;

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
                        $this->Servico[] = $Servico;

                        return $this;
            }

             /**
             * Get the value of Tipo
             */
            public function getTipo()
            {
                        return $this->Tipo;
            }

            /**
             * Set the value of Tipo
             */
            public function setTipo($tipo)
            {
                        $this->Tipo = $tipo;

                        return $this;
            }
    }
?>