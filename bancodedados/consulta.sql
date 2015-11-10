SELECT space.created_at as space_created_at,
       space.created_by as space_created_by,
       space.id as space_id, 
       space.name as space_name, 
       space.description as space_description,
       user.username as user_username,
       space.finish_at as space_finish_at,
       group_concat(tag.nome separator '; ') as tag_names
           
FROM space, user, tag, space_tag,
	 (SELECT t1.space_id FROM
		 (SELECT space_tag.space_id FROM space_tag WHERE space_tag.tag_id=4) t1 INNER JOIN
         (SELECT space_tag.space_id FROM space_tag WHERE space_tag.tag_id=4) t2 INNER JOIN
		 (SELECT space_tag.space_id FROM space_tag WHERE space_tag.tag_id=4) t3 INNER JOIN
         (SELECT space_tag.space_id FROM space_tag WHERE space_tag.tag_id=1) t4
         ON t1.space_id=t2.space_id and t1.space_id=t3.space_id and t1.space_id=t4.space_id) filtro

WHERE 	space.id=filtro.space_id and 
		user.id=space.created_by and 
        filtro.space_id=space_tag.space_id and
        space_tag.tag_id=tag.id  
	
group by space.name;
