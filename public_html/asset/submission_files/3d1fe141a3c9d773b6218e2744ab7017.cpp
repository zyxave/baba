#include <stdio.h>
#include <math.h>
#define INF 2000000000

int T, N, a[100005], x, y, M;

int main () {
	scanf("%d", &T);
	while(T--) {
		scanf("%d %d", &N, &M);
		for (int i = 1; i <= N; i++) {
			scanf("%d", &a[i]);
		}
		int smin = INF;
		for (int i = 1; i <= N-1; i++) {
			for (int j = i + 1; j <= N; j++) {
				if (smin > abs(a[i] - a[j]) && a[i] + a[j] == M) {
					smin = abs(a[i] - a[j]);
					x = a[i];
					y = a[j];
				}
			}
		}
		if (smin == INF) printf("Billy rapopo\n");
		else printf("%d %d\n", x, y);
	}
	return 0;
}
