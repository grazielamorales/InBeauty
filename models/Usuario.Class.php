<?php
    class Usuario
    {
        public function __construct(
            private $idUsuario = 0,
            private string $Nome = "",
            private string $Cpf = "",
            private string $DataNascimento = "",
            private string $Celular = "",
            private string $Email = "",
            private string $Senha = "",          
            private string $Situacao = "", 
            private string $Apelido = "",
            private string $Sexo = ""
            
        ){}

           

            /**
             * Get the value of idUsuario
             */
            public function getIdUsuario()
            {
                        return $this->idUsuario;
            }

            /**
             * Set the value of idUsuario
             */
            public function setIdUsuario(int $idUsuario)
            {
                        $this->idUsuario = $idUsuario;

                        return $this;
            }

            /**
             * Get the value of Nome
             */
            public function getNome(): string
            {
                        return $this->Nome;
            }

            /**
             * Set the value of Nome
             */
            public function setNome(string $Nome): self
            {
                        $this->Nome = $Nome;

                        return $this;
            }

            /**
             * Get the value of Cpf
             */
            public function getCpf(): string
            {
                        return $this->Cpf;
            }

            /**
             * Set the value of Cpf
             */
            public function setCpf(string $Cpf): self
            {
                        $this->Cpf = $Cpf;

                        return $this;
            }

            /**
             * Get the value of DataNascimento
             */
            public function getDataNascimento(): string
            {
                        return $this->DataNascimento;
            }

            /**
             * Set the value of DataNascimento
             */
            public function setDataNascimento(string $DataNascimento): self
            {
                        $this->DataNascimento = $DataNascimento;

                        return $this;
            }

            /**
             * Get the value of Celular
             */
            public function getCelular(): string
            {
                        return $this->Celular;
            }

            /**
             * Set the value of Celular
             */
            public function setCelular(string $Celular): self
            {
                        $this->Celular = $Celular;

                        return $this;
            }

            /**
             * Get the value of Email
             */
            public function getEmail(): string
            {
                        return $this->Email;
            }

            /**
             * Set the value of Email
             */
            public function setEmail(string $Email): self
            {
                        $this->Email = $Email;

                        return $this;
            }

            /**
             * Get the value of Senha
             */
            public function getSenha(): string
            {
                        return $this->Senha;
            }

            /**
             * Set the value of Senha
             */
            public function setSenha(string $Senha): self
            {
                        $this->Senha = $Senha;

                        return $this;
            }
            
            /**
             * Get the value of Situacao
             */
            public function getSituacao(): string
            {
                        return $this->Situacao;
            }

            /**
             * Set the value of Situacao
             */
            public function setSituacao(string $Situacao): self
            {
                        $this->Situacao = $Situacao;

                        return $this;
            }

            /**
             * Get the value of Apelido
             */
            public function getApelido(): string
            {
                        return $this->Apelido;
            }

            /**
             * Set the value of Apelido
             */
            public function setApelido(string $Apelido): self
            {
                        $this->Apelido = $Apelido;

                        return $this;
            }

            /**
             * Get the value of Sexo
             */
            public function getSexo(): string
            {
                        return $this->Sexo;
            }

            /**
             * Set the value of Sexo
             */
            public function setSexo(string $Sexo): self
            {
                        $this->Sexo = $Sexo;

                        return $this;
            }
    }



?>