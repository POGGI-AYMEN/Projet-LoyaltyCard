package com.pa;

public class Articles {

    private String codeArticle ;
    private String nameArticle ;
    private int price ;
    private int quantity ;
    private String category ;

    public Articles(String codeArticle, String nameArticle, int price, int quantity, String category) {
        this.codeArticle = codeArticle;
        this.nameArticle = nameArticle;
        this.price = price;
        this.quantity = quantity;
        this.category = category;
    }

    public String getCodeArticle() {
        return codeArticle;
    }

    public void setCodeArticle(String codeArticle) {
        this.codeArticle = codeArticle;
    }

    public String getNameArticle() {
        return nameArticle;
    }

    public void setNameArticle(String nameArticle) {
        this.nameArticle = nameArticle;
    }

    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    public int getQuantity() {
        return quantity;
    }

    public void setQuantity(int quantity) {
        this.quantity = quantity;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }
}
