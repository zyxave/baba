import java.util.Scanner;

public class Main {
	static final int[] verticalOffset = { -1, -1, 0, 1, 1, 1, 0, -1 };
	static final int[] horizontalOffset = { 0, 1, 1, 1, 0, -1, -1, -1 };

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);

		int v = sc.nextInt();
		int h = sc.nextInt();
		int[][] matrix = new int[v][h];
		for (int i = 0; i < matrix.length; i++) {
			for (int j = 0; j < matrix[0].length; j++) {
				matrix[i][j] = sc.nextInt();
			}
		}

		boolean[][] checked = new boolean[v][h];
		int maxRegion = 0;
		for (int i = 0; i < matrix.length; i++) {
			for (int j = 0; j < matrix[0].length; j++) {
				if (!checked[i][j] && matrix[i][j] == 1) {
					maxRegion = Math.max(maxRegion, countRegion(matrix, checked, i, j));
				}
			}
		}
		System.out.println(maxRegion);

		sc.close();
	}

	static int countRegion(int[][] matrix, boolean[][] checked, int i, int j) {
		int row = matrix.length;
		int col = matrix[0].length;

		if (!(i >= 0 && i < row && j >= 0 && j < col) || !(matrix[i][j] == 1 && !checked[i][j])) {
			return 0;
		}

		checked[i][j] = true;

		int region = 1;
		for (int k = 0; k < verticalOffset.length; k++) {
			region += countRegion(matrix, checked, i + verticalOffset[k], j + horizontalOffset[k]);
		}
		return region;
	}
}