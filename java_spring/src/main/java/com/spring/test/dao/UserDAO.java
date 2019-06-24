package com.spring.test.dao;

import java.util.List;

import com.spring.test.entity.User;

public interface UserDAO {
	
	public List<User> findAll();
	
	//find by single id
	public User findById (int theId);
	
	//update user
	public void save(User theUser);
	
	//delete user by id
	public void deleteById(int theId);
}
