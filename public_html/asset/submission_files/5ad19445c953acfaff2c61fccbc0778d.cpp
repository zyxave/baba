#include <stdio.h>

int f(int n) {
	int sum = 0;
	while (n > 0) {
		sum = sum + n % 10;
		n = n / 10;
	}
	if (sum < 10) {
		return sum;
	} else {
		return f(sum);
	}
}

int main () {
	int T, N, K;
	scanf("%d", &T);
	while (T--) {
		scanf("%d %d", &N, &K);
		printf("%d\n", f(N * K));
	}
	return 0;
}
