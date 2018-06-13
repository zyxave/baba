#include <stdio.h>

int main () {
	int rak[1000002];
	int T; scanf("%d", &T);
	while (T--) {
		int a, b; scanf("%d %d", &a, &b);
		rak[a] = b;
	}
	int N; scanf("%d", &N);
	while (N--) {
		int x;
		scanf("%d", &x);
		printf("%d\n", rak[x]);
	}
	return 0;
}
