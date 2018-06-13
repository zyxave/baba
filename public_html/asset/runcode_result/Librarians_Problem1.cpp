#include <cstdio>

using namespace std;

int rak[1000001];

int main(){

	int n, testcase;
	int findBook, buku;

	scanf("%d", &n);

	for (int i=0; i<n; i++){
		int temp;
		scanf("%d %d", &buku, &temp);
		rak[buku]=temp;
	}

	scanf("%d", &testcase);

	for (int i=0; i<testcase; i++){
		scanf("%d", &findBook);
		printf("%d\n", rak[findBook]);
	}

	return 0;
}