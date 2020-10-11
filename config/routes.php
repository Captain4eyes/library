<?php

return
[
    'addBook'      => 'library/addBook',
    'editBook'     => 'library/editBook',
    'deleteBook'   => 'library/deleteBook',
    'addAuthor'    => 'library/addAuthor',
    'editAuthor'   => 'library/editAuthor',
    'deleteAuthor' => 'library/deleteAuthor',
    ''             => 'library/index', // actionIndex в LibraryController'е, по-умолчанию
    '.'            => 'library/error/$1'
];