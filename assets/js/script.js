const PAGES = {
    INDEX: 'index.php',
    LOGIN: 'login.php',
    REGISTRATION: 'registration.php',
    LOGOUT: 'logout.php',
    EDIT_ARTICLE: 'edit_article.php',
    DELETE_ARTICLE: 'delete_article.php'
}
function load(page)
{
    document.location = page;
}