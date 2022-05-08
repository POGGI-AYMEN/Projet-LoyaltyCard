package com.pa;

public class Company
{
    private int id ;
    private String email ;
    private String name ;
    private String contact ;
    private String phoneNumber ;
    private String address ;
    private String code_postal ;
    private String city ;
    //*************** getters && setters**************** //

    public int getId() {
        return id;
    }

    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    public void setCode_postal(String code_postal) {
        this.code_postal = code_postal;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getContact() {
        return contact;
    }

    public void setContact(String contact) {
        this.contact = contact;
    }

    public String getPhoneNumber() {
        return phoneNumber;
    }

    public void setPhoneNumber(int phoneNumber) {
        this.phoneNumber = String.valueOf(phoneNumber);
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getCode_postal() {
        return code_postal;
    }

    public void setCode_postal(int code_postal) {
        this.code_postal = String.valueOf(code_postal);
    }

    // ********************* methodes************************ //



}
