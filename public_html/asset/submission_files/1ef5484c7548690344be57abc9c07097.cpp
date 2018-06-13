#include <iostream>
using namespace std;

int N, M, a[12][12], ans;

void f(int i, int j) {
	ans++;
	a[i][j] = 0;
	if (j < M && a[i][j+1] == 1) f(i, j+1); //timur
	if (j < M && i < N && a[i+1][j+1] == 1) f(i+1, j+1); //tenggara
	if (i < N && a[i+1][j] == 1) f(i+1, j); //selatan
	if (i < N && j > 1 && a[i+1][j-1] == 1) f(i+1, j-1); //barat daya
	if (j > 1 && a[i][j-1] == 1) f(i, j-1); //barat
	if (j > 1 && i > 1 && a[i-1][j-1] == 1) f(i-1, j-1); //barat laut
	if (i > 1 && a[i-1][j] == 1) f(i-1, j); //utara
	if (i > 1 && j < M && a[i-1][j+1] == 1) f(i-1, j+1); //timur laut
}

int main () {
	int T;
	scanf("%d", &T);
	while (T--) {
		for (int i = 0; i <= 10; i++) {
			for (int j = 0; j <= 10; j++) {
				a[i][j] = 0;
			}
		}
		scanf("%d %d", &N, &M);
		for (int i = 1; i <= N; i++) {
			for (int j = 1; j <= M; j++) {
				scanf("%d", &a[i][j]);
			}
		}
		ans = 0;
		int best = 0;
		for (int i = 1; i <= N; i++) {
			for (int j = 1; j <= M; j++) {
				if (a[i][j] == 1) {
					ans = 0;
					f(i, j);
					best = max(best, ans);
				}
			}
		}
		printf("%d\n", best);
	}
	return 0;
}
