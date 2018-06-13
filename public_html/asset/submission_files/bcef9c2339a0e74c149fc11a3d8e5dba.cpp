#include <iostream>
#include <cstdio>
using namespace std;

int T, total[100+5], a[100+5], b[100+5], R, D, N, ans;

int main () {
	scanf("%d", &T);
	while (T--) {
		scanf("%d %d %d", &N, &D, &R);
		for (int i = 1; i <= N; i++) {
			scanf("%d", &a[i]);
		}
		ans = 0;
		for (int i = 1; i <= N; i++) {
			scanf("%d", &b[i]);
		}
		for (int i = 1; i <= N; i++) {
			total[i] = a[i] + b[i];
			if (total[i] > D) {
				ans = ans + (total[i] - D) * R;
			}
		}
		printf("%d\n", ans);		
	}
}
