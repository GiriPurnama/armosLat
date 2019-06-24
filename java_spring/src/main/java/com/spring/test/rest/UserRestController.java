package com.spring.test.rest;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;


import com.spring.test.entity.User;
import com.spring.test.service.UserService;

@RestController
@RequestMapping("/api")
public class UserRestController {

	private UserService userService;
	
	//Inject Employee DAO
	@Autowired
	public UserRestController(UserService theUserService)
	{
		userService = theUserService;
	}
	
	//Expose "/users" and return all list of users
	@GetMapping("/users")
	public List<User> findAll()
	{
		return userService.findAll();
	}
	
	//Get user by single id
	@GetMapping("/users/{userId}")
	public User getUser(@PathVariable int userId)
	{
		User theUser= userService.findById(userId);
		
		if(theUser==null)
		{
			throw new RuntimeException("User ID not found -" + userId);
		}
		return theUser;
	}
	
	//Add new user
	@PostMapping("/users")
	public User addUser(@RequestBody User theUser)
	{
		//set id=0
		theUser.setId(0);
		userService.save(theUser);
		return theUser;
	}
	
	//Update User
	@PutMapping("/users")
	public User updateUser(@RequestBody User theUser)
	{
		userService.save(theUser);
		return theUser;
	}
	
	//Delete User
	@DeleteMapping("/users/{userId}")
	public String deleteUser(@PathVariable int userId)
	{
		User tempUser= userService.findById(userId);
		
		if(tempUser==null)
		{
			throw new RuntimeException("User ID not found -" + userId);
		}
		
		userService.deleteById(userId);
		
		return "Deleted User ID -" + userId;
	}

}
