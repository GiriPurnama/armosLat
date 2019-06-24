package com.spring.test.dao;

import java.util.List;

import javax.persistence.EntityManager;

import org.hibernate.Session;
import org.hibernate.query.Query;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

import com.spring.test.entity.User;

@Repository
public class UserDAOHibernateImpl implements UserDAO {

	
	//Define field for entity manager
	private EntityManager entityManager;
	
	//Set up constructor injection
	@Autowired
	public UserDAOHibernateImpl(EntityManager theEntityManager)
	{
		entityManager=theEntityManager;
	}
	
	
	@Override
	public List<User> findAll() {
		//get the current hibernate session
		Session currentSession = entityManager.unwrap(Session.class);
		
		//create a query
		Query<User> theQuery=
				currentSession.createQuery("from User", User.class);
		
		//execute a query and get the result list
		List<User> users = theQuery.getResultList();
		
		//return the results
		return users;
	}


	@Override
	public User findById(int theId) {
		// get the current hibernate session
		Session currentSession = entityManager.unwrap(Session.class);
		// get user
		User theUser=
				currentSession.get(User.class,theId);
		// return user
		return theUser;
	}


	@Override
	public void save(User theUser) {
		//get the current hibernate session
		Session currentSession = entityManager.unwrap(Session.class);
		
		// save user
		currentSession.saveOrUpdate(theUser);
	}


	@Override
	public void deleteById(int theId) {
		//get the current hibernate session
		Session currentSession = entityManager.unwrap(Session.class);
		
		//delete object with primary key
		Query theQuery =
				currentSession.createQuery("delete from User where id=:userId");
		//Set parameter to be use in query
		theQuery.setParameter("userId",theId);
		
		theQuery.executeUpdate();
		
	}

}
