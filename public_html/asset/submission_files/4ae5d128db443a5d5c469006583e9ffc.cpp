#include <bits/stdc++.h>
using namespace std;

int T, n, m, maks, ma[20][20];

int drow[] = {-1, 0, 1, -1, 1, -1, 0, 1};
int dcol[] = {-1, -1, -1, 0, 0, 1, 1, 1};

bool keluar(int i, int j) {
	return (i < 1) || (j < 1) || (i > n) || (j > m);
}

int DFS(int i, int j) {
	if (keluar(i, j) || ma[i][j] == 0) return 0;
	ma[i][j] = 0;
	int ret = 1;
	for (int id = 0; id < 8; id++) {
		ret += DFS(i + dcol[id], j+drow[id]);
	}
	return ret;
}

int main() {
	cin >> T;
	while (T--) {
		cin >> n >> m;
		for (int i = 1; i <= n; i++) {
			for (int j = 1; j <= m; j++) {
				cin >> ma[i][j];
			}
		}
		maks = 0;
		for (int i = 1; i <= n; i++) {
			for (int j = 1; j <= m; j++) {
				maks = max(maks, DFS(i, j));
			}
		}
		cout << maks << "\n";
	}
	return 0;
}
