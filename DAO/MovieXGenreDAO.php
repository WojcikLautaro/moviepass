<?php

namespace DAO;

use Models\Movie;

class MovieXGenreDAO
{
    public static function getMovies(String $title = "", int $year = 0, Array $genresW = [], Array $genresWO = [])
    {
        /*
        $conection = Connection::GetInstance();
        $query = "
        select * from movies where id = :id;";

        
        $params = [];
        $params['id']               = $movie->getId();
        $params['title']            = $movie->getTitle();
        $params['releaseDate']      = $movie->getReleaseDate();
        $params['points']           = $movie->getPoints();
        $params['movieDescription'] = $movie->getDescription();
        $params['poster']           = $movie->getPoster();

        $response = $conection->Execute($query, $params);

        $roleArray = array_map(function (array $obj) {
            $movie = Movie::fromArray($obj);
            $movie->setGenres(MovieXGenreDAO::getGenresByMovieId($movie->getId()));
            return $movie;
        }, $response);

        return $roleArray;
        */
    }

    public static function checkMovieById(int $id, Array $currMovies) {
        foreach ($currMovies as $value) {
            if ($value instanceof Movie) 
                if ($value->getId() == $id) 
                    return true;
        }
        
        return false;
    }

    public static function getGenresByMovieId(int $id)
    {
        $conection = Connection::GetInstance();
        $query = "
        select idGenre from genresxmovies where idMovie = :id;";
        $response = $conection->Execute($query, array('id' => $id));

        $roleArray = array_map(function (array $obj) {
            return GenreDAO::getGenreById($obj['idGenre']);
        }, $response);

        return $roleArray;
    }

    public static function addGenreIdToMovieId(int $genreId, int $movieId)
    {
        GenreDAO::addGenre(ApiGenreDAO::getApiGenreById($genreId));

        $conection = Connection::GetInstance();
        $query = "
        INSERT INTO `genresxmovies`(`idMovie`, `idGenre`) 
        VALUES (:movieId, :genreId)";

        $params = [];
        $params['movieId']  = $movieId;
        $params['genreId']  = $genreId;

        $conection->ExecuteNonQuery(
            $query,
            $params
        );
    }
}