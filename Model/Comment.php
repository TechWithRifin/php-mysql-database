<?php

namespace Model {
    class Comment
    {
        private ?int $id;
        private ?string $email;
        private ?string $comment;

        public function __construct(?int $id = null, ?string $email = null, ?string $comment = null)
        {
            $this->id = $id;
            $this->email = $email;
            $this->comment = $comment;
        }

        // setter property id
        public function setId(?int $id): void
        {
            $this->id = $id;
        }

        // setter property email
        public function setEmail(?string $email): void
        {
            $this->email = $email;
        }

        // setter property comment
        public function setComment(?string $comment): void
        {
            $this->comment = $comment;
        }

        //getter property id
        public function getId(): ?int
        {
            return $this->id;
        }

        //getter property email
        public function getEmail(): ?string
        {
            return $this->email;
        }

        //getter property comment
        public function getComment(): ?string
        {
            return $this->comment;
        }
    }
}

// untuk mempermudah, nama class dari model atau entity harus sama dengan nama tabel nya misalnya nama tabelnya comments maka nama class nya harus Comment
// properti disamakan dengan nama kolom pada table comment (semua kolom pada table harus dibuatkan propertynya)
// setiap property harus memiliki function getter() dan function setter() nya (1 properti memiliki 1 setter dan 1 getter).Misalnya untuk kasus kali ini, kita membuat 3 setter dan 3 getter