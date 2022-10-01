<?php

namespace Repository {

    use Model\Comment;

    interface CommentRepository
    {
        public function insert(Comment $comment): Comment;
        public function findById(int $id): ?Comment;
        public function findAll(): array;
    }

    class CommentRepositoryImpl implements CommentRepository
    {
        // constructor property promotion (fitur baru php 8)
        public function __construct(private \PDO $connection)
        {
        }

        public function insert(Comment $comment): Comment
        {
            $sql = "INSERT INTO comments(email, comment) VALUES (?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$comment->getEmail(), $comment->getComment()]);
            $id = $this->connection->lastInsertId();
            $comment->setId($id);
            return $comment;
        }

        public function findById(int $id): ?Comment
        {
            $sql = "SELECT * FROM comments WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            if ($row = $statement->fetch()) {
                // named argument (fitur baru dari php 8)
                return new Comment(
                    id: $row['id'],
                    email: $row['email'],
                    comment: $row['comment']
                );
            } else {
                return null;
            }
        }
        public function findAll(): array
        {
            $sql = "SELECT * FROM comments";
            $statement = $this->connection->query($sql);

            $array = [];

            foreach ($statement->fetchAll() as $row) {
                $array[] = new Comment(
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            }
            return $array;
        }
    }
}