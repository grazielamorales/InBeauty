<?php
    class Serv_Prest_Serv 
    {
        public function __construct(
            private  $id = 0,
            private  $prestador = null,
            private  $servico = null,
            private  $situacao = "Ativo",           
            
        ){}          


            /**
             * Get the value of id
             */
            public function getId()
            {
                        return $this->id;
            }

            /**
             * Set the value of id
             */
            public function setId($id): self
            {
                        $this->id = $id;

                        return $this;
            }

            /**
             * Get the value of prestador
             */
            public function getPrestador()
            {
                        return $this->prestador;
            }

            /**
             * Set the value of prestador
             */
            public function setPrestador($prestador)
            {
                        $this->prestador = $prestador;

                        return $this;
            }

            /**
             * Get the value of servico
             */
            public function getServico()
            {
                        return $this->servico;
            }

            /**
             * Set the value of servico
             */
            public function setServico($servico)
            {
                        $this->servico = $servico;

                        return $this;
            }

            /**
             * Get the value of situacao
             */
            public function getSituacao()
            {
                        return $this->situacao;
            }

            /**
             * Set the value of situacao
             */
            public function setSituacao($situacao)
            {
                        $this->situacao = $situacao;

                        return $this;
            }
    }    
?>