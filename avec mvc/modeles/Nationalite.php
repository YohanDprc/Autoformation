<?php

class Nationalite
{

    /**
     * numéro du nationalité
     *
     * @var int
     */
    private $num;

    /**
     * libelle du nationalité
     *
     * @var string
     */
    private $libelle;

    /**
     * numéro continent (clé étrangère)
     *
     * @var int
     */
    private $numNationalite;

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
     * renvoie l'objet continent associé
     *
     * @return Continent
     */
    public function getNumContinent(): Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * écrit le num continent
     *
     * @param Continent $continent
     * @return self
     */
    public function setNumContinent(Continent $continent): self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

    /**
     * retourne l'ensemble des nationalités
     *
     * @return Nationalite[] tableau d'objets nationalité
     */
    public static function findAll(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT n.num, n.libelle as 'libNation', c.libelle as 'libContinent' FROM nationalite as n, continent as c WHERE n.numContinent = c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }

    /**
     * trouve une nationalite par son num
     *
     * @param integer $id numéro du nationalite
     * @return Nationalite objet nationalite trouvé
     */
    public static function findById(int $id): Nationalite
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM nationalite WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Nationalite");
        $req->bindParam(":id", $id);
        $req->execute();
        $lesResultats = $req->fetch();
        return $lesResultats;
    }

    /**
     * permet d'ajouter un nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si l'opérartion à reussi, sinon 0)
     */
    public static function add(Nationalite $nationalite): int
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO nationalite(libelle, numContinent) values(:libelle, :numContinent)");
        $req->bindParam(":libelle", $nationalite->getLibelle());
        $req->bindParam(":numContinent", $nationalite->numContinent());
        $nb = $req->execute();
        return $nb;
    }

    /**
     * permet de modifier un nationalite
     *
     * @param Nationalite $nationalite nationalite à modifier
     * @return integer resultat (1 si l'opérartion à reussi, sinon 0)
     */
    public static function update(Nationalite $nationalite): int
    {
        $req = MonPdo::getInstance()->prepare("UPDATE nationalite set libelle = :libelle, numContinent = :continent WHERE num = :id");
        $req->bindParam(":id", $nationalite->getNum());
        $req->bindParam(":libelle", $nationalite->getLibelle());
        $req->bindParam(":numContinent", $nationalite->numContinent());
        $nb = $req->execute();
        return $nb;
    }

    /**
     * permet de supprimer un nationalite 
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite): int
    {
        $req = MonPdo::getInstance()->prepare("DELETE FROM nationalite WHERE num = :id");
        $req->bindParam(":id", $nationalite->getNum());
        $nb = $req->execute();
        return $nb;
    }
}
