package com.pa;

public class Prestations {

    private String id ;

    private String date_debut ;

    private String date_fin ;

    private String nom ;

    private String catégori ;

    public Prestations(String date_debut, String date_fin, String nom, String catégori , String id) {
        this.date_debut = date_debut;
        this.date_fin = date_fin;
        this.nom = nom;
        this.catégori = catégori;
        this.id = id ;
    }

    public String getDate_debut() {
        return date_debut;
    }

    public void setDate_debut(String date_debut) {
        this.date_debut = date_debut;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDate_fin() {
        return date_fin;
    }

    public void setDate_fin(String date_fin) {
        this.date_fin = date_fin;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getCatégori() {
        return catégori;
    }

    public void setCatégori(String catégori) {
        this.catégori = catégori;
    }
}
