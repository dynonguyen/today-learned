package vn.metamarket.productservice.controllers;

import java.util.ArrayList;
import java.util.List;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.metamarket.productservice.models.Product;

@RestController
public class ProductController {
    @GetMapping("/list")
    public List<Product> getProducts() {
        List<Product> products = new ArrayList<>();
        products.add(new Product(1, "IPhone 12", 19000000));
        products.add(new Product(2, "IPhone 14", 25000000));
        return products;
    }
}