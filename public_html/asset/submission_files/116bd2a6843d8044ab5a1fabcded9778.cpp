#include <stdio.h>

int fpb(int a, int b) {
	if (b != 0) return (b, a % b);
	else return a; 
}

int p(int n) {
	int ret = 1;
	for (int i = 1; i <= n; i++) {
		ret = ret * 2;
	}
	return ret;
}

int f(int n) {
	int ret = 0;
	for (int i = 1; i <= p(n); i++) {
		ret = ret + (i / fpb(i, p(n)));
	}
	return ret % 1000000007;
}

int main () {
	int T; scanf("%d", &T);
	while (T--) {
		int N; scanf("%d", &N);
		printf("%d\n", f(N));
	}
	return 0;
}
