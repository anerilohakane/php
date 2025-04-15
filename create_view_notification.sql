DROP VIEW IF EXISTS view_notification;
CREATE VIEW view_notification AS 
SELECT * FROM (
    SELECT 
        tc.customer_id AS id,
        CONCAT(tc.f_name,' ', tc.l_name) AS name, 
        tc.email AS email, 
        tc.mobile AS mobile, 
        tc.created_at AS not_date, 
        tc.display AS display, 
        tc.customer_photo AS photo,
        tc.updated_at AS ord_comp, 
        'customer' AS tbl,
        tc.created_by as created_by, 
        tc.customer_id as user_id 
    FROM tbl_customer tc 
    WHERE tc.display='Y'
    UNION ALL
    SELECT 
        tp.payment_id AS id,
        (SELECT CONCAT(f_name,' ', l_name) FROM tbl_customer WHERE customer_id = tp.customer_id) AS name, 
        (SELECT email FROM tbl_customer WHERE customer_id = tp.customer_id) AS email, 
        (SELECT mobile FROM tbl_customer WHERE customer_id = tp.customer_id) AS mobile, 
        tp.created_on AS not_date, 
        tp.display AS display, 
        tp.membership_amt AS photo,
        tp.created_on AS ord_comp, 
        'payment' AS tbl,
        (SELECT CONCAT(f_name,' ', l_name) FROM tbl_customer WHERE customer_id = tp.customer_id) as created_by,
        tp.user_id as user_id 
    FROM tbl_payment_details tp 
    WHERE tp.display='Y'
) AS combined_data
ORDER BY not_date DESC 
LIMIT 10; 