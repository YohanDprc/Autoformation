<?php

class Continent
{

    /**
     * numéro du continent
     *
     * @var int
     */
    private $num;

    /**
     * libelle du continent
     *
     * @var string
     */
    private $libelle;

    /**
     * Set numéro du continent
     *
     * @param  int  $num  numéro du continent
     *
     * @return  self
     */
    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * lit le libelle
     *
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * écrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * retourne l'ensemble des continents
     *
     * @return Continent[] tableau d'objets continent
     */
    public static function findAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM continent");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Continent");
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }

    /**
     * trouve un continent par son num
     *
     * @param integer $id numéro du continent
     * @return Continent objet continent trouvé
     */
    public static function findById(int $id): Continent
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM continent WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Continent");
        $req->bindParam(":id", $id);
        $req->execute();
        $lesResultats = $req->fetch();
        return $lesResultats;
    }

    /**
     * permet d'ajouter un continent
     *
     * @param Continent $continent continent à ajouter
     * @return integer resultat (1 si l'opérartion à reussi, sinon 0)
     */
    public static function add(Continent $continent): int
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO continent(libelle) values(:libelle)");
        $libelle = $continent->getLibelle();
        $req->bindParam(":libelle", $libelle);
        $nb = $req->execute();
        return $nb;
    }

    /**
     * permet de modifier un continent
     *
     * @param Continent $continent continent à modifier
     * @return integer resultat (1 si l'opérartion à reussi, sinon 0)
     */
    public static function update(Continent $continent): int
    {
        $req = MonPdo::getInstance()->prepare("UPDATE continent set libelle = :libelle WHERE num = :id");
        $num = $continent->getNum();
        $libelle = $continent->getLibelle();
        $req->bindParam(":id", $num);
        $req->bindParam(":libelle", $libelle);
        $nb = $req->execute();
        return $nb;
    }

    /**
     * permet de supprimer un continent 
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent): int
    {
        $req = MonPdo::getInstance()->prepare("DELETE FROM continent WHERE num = :id");
        $num = $continent->getNum();
        $req->bindParam(":id", $num);
        $nb = $req->execute();
        return $nb;
    }
}
