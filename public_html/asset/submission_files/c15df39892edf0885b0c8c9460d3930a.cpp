#include <iostream>
#include <cstdio>
using namespace std;

int T, lembur[1000+5], a[1000+5], b[1000+5], R, D, N, ans;

int main () {
	scanf("%d", &T);
	while (T--) {
		ans = 0;
		scanf("%d %d %d", &N, &D, &R);
		for (int i = 1; i <= N; i++) {
			scanf("%d", &a[i]);
		}
		for (int i = 1; i <= N; i++) {
			scanf("%d", &b[i]);
			if (a[i] + b[i] > D) lembur[i] = a[i] + b[i] - D;
			else lembur[i] = 0;
		}
		for (int i = 1; i <= N; i++) {
			ans = ans + lembur[i] * 5;
		}
		printf("%d\n", ans);		
	}
}
