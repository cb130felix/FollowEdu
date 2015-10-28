## Implementando procedimento

DELIMITER $$

DROP PROCEDURE IF EXISTS rotinaRecommend $$
CREATE PROCEDURE rotinaRecommend()
	BEGIN

		DECLARE count INT default 0;
		DECLARE recommend INT default 0;
		DECLARE max INT default (SELECT count(*) as id FROM user);
		DECLARE last_space INT default (SELECT MAX(ID) as id FROM space);
		DECLARE last_notification_id INT default (SELECT MAX(ID) as id FROM notification);
        DECLARE user_created_space INT default (SELECT S.created_by FROM space S WHERE S.id=last_space);
        DECLARE user_id_atual INT;
        DECLARE check_user_notification INT default 0;
        
		WHILE (count < max) DO
			SET user_id_atual = (SELECT user.id FROM user LIMIT count,1);
            
			SET recommend = (SELECT count(*) FROM (SELECT T.tag_id FROM space_tag T, space S WHERE S.id=last_space and S.id=T.space_id) S,
							      (SELECT T.tag_id FROM user_tag T, user U WHERE U.id=user_id_atual and U.id=T.user_id) U
							 WHERE U.tag_id = S.tag_id);
                             
			IF (recommend>=1 and user_id_atual!=user_created_space) THEN
				SET check_user_notification = (SELECT count(*) FROM notification N WHERE N.class="SpaceRecommend" and N.user_id=user_id_atual and N.space_id=last_space);

				IF (check_user_notification=0) THEN
					SET last_notification_id = last_notification_id+1;
					INSERT INTO notification VALUES (last_notification_id, "SpaceRecommend", user_id_atual, 0, "User", 10, "Space", last_space, last_space, 0, NOW(), user_id_atual, NOW(), 1, 1);
					SET recommend=0;
				END IF;
                SET check_user_notification=0;
			END IF;
            
			SET count = count+1;
            
		END WHILE;
	END; $$

## Fim de procedimento
## Implementando rotina

DROP TRIGGER IF EXISTS recomendacao $$
CREATE TRIGGER recomendacao AFTER INSERT ON space_tag FOR EACH ROW 
	BEGIN
	
		CALL rotinaRecommend();
		
	END; $$
    
## Fim de rotina