package vn.metemarket.userservice.controllers;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import vn.metemarket.userservice.models.User;

@RestController
public class DemoController {
    @GetMapping("/list")
    public List<User> getUserList() {
        List<User> userList = new ArrayList<>();
        userList.add(new User(1, "Dyno", "Nguyễn", new Date()));
        userList.add(new User(2, "Tuấn", "Nguyễn", new Date()));
        return userList;
    }
}