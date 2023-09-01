<?php 
    Class Empresa{
        public function __construct(
            private int $idEmpresa = 0,
            private string $NomeFantasia = "",
            private string $RazaoSocial = "",
            private string $Cnpj = "",
            private string $Logradouro = "",
            private string $Num = "",
            private string $Bairro = "",
            private string $Cep = "",
            private string $Cidade = "",
            private string $Uf = "",
            private string $Fone = "",
            private string $Email = "",
            private string $Senha = "",
            private string $Status = "",
            private $prestador = array(),

        ){}

        

            /**
             * Get the value of idEmpresa
             */
            public function getIdEmpresa(): int
            {
                        return $this->idEmpresa;
            }

            /**
             * Set the value of idEmpresa
             */
            public function setIdEmpresa(int $idEmpresa): self
            {
                        $this->idEmpresa = $idEmpresa;

                        return $this;
            }

            /**
             * Get the value of NomeFantasia
             */
            public function getNomeFantasia(): string
            {
                        return $this->NomeFantasia;
            }

            /**
             * Set the value of NomeFantasia
             */
            public function setNomeFantasia(string $NomeFantasia): self
            {
                        $this->NomeFantasia = $NomeFantasia;

                        return $this;
            }

            /**
             * Get the value of RazaoSocial
             */
            public function getRazaoSocial(): string
            {
                        return $this->RazaoSocial;
            }

            /**
             * Set the value of RazaoSocial
             */
            public function setRazaoSocial(string $RazaoSocial): self
            {
                        $this->RazaoSocial = $RazaoSocial;

                        return $this;
            }

            /**
             * Get the value of Cnpj
             */
            public function getCnpj(): string
            {
                        return $this->Cnpj;
            }

            /**
             * Set the value of Cnpj
             */
            public function setCnpj(string $Cnpj): self
            {
                        $this->Cnpj = $Cnpj;

                        return $this;
            }

            /**
             * Get the value of Logradouro
             */
            public function getLogradouro(): string
            {
                        return $this->Logradouro;
            }

            /**
             * Set the value of Logradouro
             */
            public function setLogradouro(string $Logradouro): self
            {
                        $this->Logradouro = $Logradouro;

                        return $this;
            }

            /**
             * Get the value of Num
             */
            public function getNum(): string
            {
                        return $this->Num;
            }

            /**
             * Set the value of Num
             */
            public function setNum(string $Num): self
            {
                        $this->Num = $Num;

                        return $this;
            }

            /**
             * Get the value of Bairro
             */
            public function getBairro(): string
            {
                        return $this->Bairro;
            }

            /**
             * Set the value of Bairro
             */
            public function setBairro(string $Bairro): self
            {
                        $this->Bairro = $Bairro;

                        return $this;
            }

            /**
             * Get the value of Cep
             */
            public function getCep(): string
            {
                        return $this->Cep;
            }

            /**
             * Set the value of Cep
             */
            public function setCep(string $Cep): self
            {
                        $this->Cep = $Cep;

                        return $this;
            }

            /**
             * Get the value of Cidade
             */
            public function getCidade(): string
            {
                        return $this->Cidade;
            }

            /**
             * Set the value of Cidade
             */
            public function setCidade(string $Cidade): self
            {
                        $this->Cidade = $Cidade;

                        return $this;
            }

            /**
             * Get the value of Uf
             */
            public function getUf(): string
            {
                        return $this->Uf;
            }

            /**
             * Set the value of Uf
             */
            public function setUf(string $Uf): self
            {
                        $this->Uf = $Uf;

                        return $this;
            }

            /**
             * Get the value of Fone
             */
            public function getFone(): string
            {
                        return $this->Fone;
            }

            /**
             * Set the value of Fone
             */
            public function setFone(string $Fone): self
            {
                        $this->Fone = $Fone;

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
             * Get the value of Status
             */
            public function getStatus(): string
            {
                        return $this->Status;
            }

            /**
             * Set the value of Status
             */
            public function setStatus(string $Status): self
            {
                        $this->Status = $Status;

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
                        $this->prestador[] = $prestador;

                        return $this;
            }
    }
?>


