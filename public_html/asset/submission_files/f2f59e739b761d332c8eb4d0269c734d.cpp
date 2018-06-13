#include <iostream>
#include <cstdio>
using namespace std;

int T, total[100+5], a[100+5], b[100+5], R, D, N, ans;

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
			total[i] = a[i] + b[i];
			if (total[i] >= D) {
				ans = ans + (total[i] - D) * R;
			}
		}
		/*
		for (int i = 1; i <= N; i++) {
			
		}
		*/
		printf("%d\n", ans);		
	}
}
