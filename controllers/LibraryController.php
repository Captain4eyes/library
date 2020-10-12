<?php

/**
 * Class LibraryController
 */
class LibraryController
{
    /**
     * @return bool
     */
    public function actionIndex()
    {
        $data['books'] = Book::getAllBooksWithAuthors();
        $data['authors'] = Author::getAuthorsWithBookCount();
        return View::render('index', ['data' => $data]);
    }

    /**
     * @return bool|string
     */
    public function actionAddBook()
    {
        if (isset($_POST['add-book-btn']) && isset($_POST['author_id'])) {
            $book = new Book($_POST['author_id'], $_POST['title'], $_POST['location']);
            $book->save();
            header('Location: /');
            // TODO: Add exceptions.
            return 'New book was successfully added!';
        } else {
            $authors = Author::getAuthorsList();
            return View::render('add-book', ['authors' => $authors]);
        }
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function actionEditBook($id)
    {
        if (isset($_POST['edit-book-btn'])) {
            $book = new Book($_POST['author_id'], $_POST['title'], $_POST['location']);
            $book->update($id, $book);
            header('Location: /');
            // TODO: Add exceptions.
            return 'Book was successfully updated!';
        } else {
            $book = Book::getRowDataById(Book::TABLE_NAME, $id);
            $authors = Author::getAuthorsList();
            return View::render('edit-book', ['authors' => $authors, 'book' => $book]);
        }
    }

    /**
     * @param $id
     */
    public function actionDeleteBook($id)
    {
        Book::delete($id);
        header('Location: /');
    }

    /**
     * @return bool
     */
    public function actionAddAuthor()
    {
        if (isset($_POST['add-author-btn'])) {
            $author = new Author($_POST['firstName'], $_POST['lastName']);
            $author->save();
            header('Location: /');
        } else {
            return View::render('add-author');
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionEditAuthor($id)
    {
        if (isset($_POST['edit-author-btn'])) {
            $author = new Author($_POST['first_name'], $_POST['last_name']);
            $author->update($id, $author);
            header('Location: /');
            // TODO: Add exceptions.
            return 'Book was successfully updated!';
        } else {
            $author = Author::getRowDataById(Author::TABLE_NAME, $id);
            return View::render('edit-author', ['author' => $author]);
        }
    }

    /**
     * @param $id
     */
    public function actionDeleteAuthor($id)
    {
        Author::delete($id);
        header('Location: /');
    }

    /**
     * @return bool
     */
    public function actionError()
    {
        return View::render('404');
    }
}