<?php
    class Servico
    {
        public function __construct(
            private $idServico = 0,
            private $descritivo = "",
            private $preco= 0,
            private $tempoEstimado = ""          
            
        ){}       


            /**
             * Get the value of idServico
             */
            public function getIdServico()
            {
                        return $this->idServico;
            }

            /**
             * Set the value of idServico
             */
            public function setIdServico(int $idServico): self
            {
                        $this->idServico = $idServico;

                        return $this;
            }

            /**
             * Get the value of descritivo
             */
            public function getDescritivo()
            {
                        return $this->descritivo;
            }

            /**
             * Set the value of descritivo
             */
            public function setDescritivo(string $descritivo)
            {
                        $this->descritivo = $descritivo;

                        return $this;
            }

            /**
             * Get the value of preco
             */
            public function getPreco()
            {
                        return $this->preco;
            }

            /**
             * Set the value of preco
             */
            public function setPreco(float $preco)
            {
                        $this->preco = $preco;

                        return $this;
            }

            /**
             * Get the value of tempoEstim
             */
            public function getTempoEstimado()
            {
                        return $this->tempoEstimado;
            }

            /**
             * Set the value of tempoEstim
             */
            public function setTempoEstimado(string $tempoEstimado)
            {
                        $this->tempoEstimado = $tempoEstimado;

                        return $this;
            }
           
    }



?>