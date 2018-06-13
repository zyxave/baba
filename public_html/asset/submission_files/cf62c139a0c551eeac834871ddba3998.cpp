#include <stdio.h>
#include <iostream>
#include <string>

using namespace std;

int main() {
	int n;
	scanf("%d", &n);
	int x[n];
	for (int i = 0; i < n; i++) {
		int a, b;
		scanf("%d%d", &a, &b);
		x[b] = a;
	}
	int t;
	scanf("%d", &t);
	while (t--) {
		int z;
		scanf("%d", &z);
		printf("%d\n", x[z]);
	}
}
