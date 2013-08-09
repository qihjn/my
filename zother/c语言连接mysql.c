/*
 * Брвы
 * gcc mysql.c -o mysql -lmysqlclient -I/usr/local/mysql/include/mysql/ -L/usr/local/mysql/lib/mysql 
 */

#include "/usr/local/mysql/include/mysql/mysql.h"
#include "stdlib.h"  
#include "stdio.h" 

int   main(int   argc,char   *argv[])   
{   
	char   *user="root",   *pwd   =   "2144testmysql",   *dbname   =   "mysql";   
	MYSQL   mysql;   
	MYSQL_RES   *mysql_ret;   
	MYSQL_ROW   mysql_row;   
	unsigned   long   num_rows;   
	int   ret;   

	mysql_init(&mysql);   

	if(mysql_real_connect(&mysql,"localhost",user,pwd,dbname,0,NULL,0))   
	{   
	    printf( "Connection   success!\n ");   
	    ret   =   mysql_query(&mysql, "select   *   from    user ");   
	    if(!ret)   
	    {   
	    printf( "Query   Success!\n ");   
	    mysql_ret   =   mysql_store_result(&mysql);   
	    if(mysql_ret   !=   NULL)   
	    {   
	    printf( "Store   Result   Success!\n ");   
	    num_rows   =   mysql_num_rows(mysql_ret);   
	    if(num_rows   !=   0)   
	    {   
	    printf( "%d\n ",num_rows);   
	    while(mysql_row   =   mysql_fetch_row(mysql_ret))   
	    {   
	    printf( "%s\t%s\t%s\t%s\t%s\t%s\n ",mysql_row[0],mysql_row[1],mysql_row[2],mysql_row[3],mysql_row[4],mysql_row[5]);   
	    }   
	    }   
	    else   
	    {   
	    printf( "mysql_num_rows   Failed!\n ");   
	    exit(-1);   
	    }   
	    mysql_free_result(mysql_ret);   
	    exit(0);   
	    }   
	    else   
	    {   
	    printf( "Store   Result   Failed!\n ");   
	    exit(-1);   
	    }   
	    }   
	    else   
	    {   
	    printf( "Query   Failed!\n ");   
	    exit(-1);   
	    }   
	}   
	else   
	{   
	printf( "Connection   Failed\n ");   
	exit(-1);   
	}   
}   


