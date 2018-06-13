import java.util.Scanner;

public class Main {
	static final int[] R_OFFSETS = { -1, -1, 0, 1, 1, 1, 0, -1 };
	static final int[] C_OFFSETS = { 0, 1, 1, 1, 0, -1, -1, -1 };

	public static void main(String[] args) {
		Scanner tes = new Scanner(System.in);
                int T = tes.nextInt();
                int[] banyak = new int[T];
                for(int a=0;a<T;a++){
                Scanner sc = new Scanner(System.in);

		int n = sc.nextInt();
		int m = sc.nextInt();
		int[][] matrix = new int[n][m];
		for (int r = 0; r < matrix.length; r++) {
			for (int c = 0; c < matrix[0].length; c++) {
				matrix[r][c] = sc.nextInt();
			}
		}

		boolean[][] visited = new boolean[n][m];
		int maxRegion = 0;
		for (int r = 0; r < matrix.length; r++) {
			for (int c = 0; c < matrix[0].length; c++) {
				if (!visited[r][c] && matrix[r][c] == 1) {
					maxRegion = Math.max(maxRegion, countRegion(matrix, visited, r, c));
				}
			}
		}
                banyak[a]=maxRegion;
                }
                for(int x=0;x<T;x++){
                    System.out.println(banyak[x]);
                }
                
        }
	static int countRegion(int[][] matrix, boolean[][] visited, int r, int c) {
		int row = matrix.length;
		int col = matrix[0].length;

		if (!(r >= 0 && r < row && c >= 0 && c < col) || !(matrix[r][c] == 1 && !visited[r][c])) {
			return 0;
		}

		visited[r][c] = true;

		int region = 1;
		for (int i = 0; i < R_OFFSETS.length; i++) {
			region += countRegion(matrix, visited, r + R_OFFSETS[i], c + C_OFFSETS[i]);
		}
		return region;
	}
}
