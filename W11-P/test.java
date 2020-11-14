package w11;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;

public class test {	
	private static String className = "oracle.jdbc.driver.OracleDriver";
	private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
	private static String user = "hr";
	private static String password = "1234";
	
	public Connection getConnection() {
		Connection conn = null;
		
		try {
			Class.forName(className);
			conn = DriverManager.getConnection(url, user, password);			
			System.out.println("connection success");
		} catch (ClassNotFoundException | SQLException e) {
			System.out.println("connection fail");
			e.printStackTrace();
		}
		
		return conn;
	}
	public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
		try {
			if (rs != null) rs.close();
			if (pstm != null) pstm.close();
			if (conn != null) conn.close();
			System.out.println("connection closed");
		} catch (SQLException sqle) {
			System.out.println("error");
			sqle.printStackTrace();
		}
	}
	
	private void select() {
		Connection conn = null;
		PreparedStatement pstm = null;
		ResultSet rs = null;
		String sql = " select e.* from ( select a.* from departments a order by a.department_id desc ) e where rownum = 1";
		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			rs = pstm.executeQuery();	
			int count = 0;
			while(rs.next()) {
				System.out.print("\ndepartment_id: " + rs.getString("department_id"));
				System.out.print("\tdepartment_name: " + rs.getString("department_name"));
				System.out.println("\tlocation_id: " + rs.getString("location_id"));
				count = count + 1;
			}			
			System.out.println(count + " row selected\n");									
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, rs);			
		}
	}
	private void update() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "update departments set location_id = 2400 where department_id = 280";		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate();
			System.out.println(count + " row updated");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}
	private void insert() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "insert into departments values (280, 'Cosmetic', NULL , 1800)";
		
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate(sql);
			System.out.println(count + " row inserted");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}
	
	private void delete() {
		Connection conn = null;
		PreparedStatement pstm = null;		
		String sql = "delete from departments where department_id = 280";
		try {
			conn = this.getConnection();
			pstm = conn.prepareStatement(sql);
			int count = pstm.executeUpdate(sql);
			System.out.println(count + " row deleted");			
		} catch (SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, pstm, null);			
		}
	}	
	
	public static void main(String[] args) {
		test so = new test();		
		so.select();
		so.insert();
		so.select();
		so.update();
		so.select();
		so.delete();
		so.select();
	}
}


