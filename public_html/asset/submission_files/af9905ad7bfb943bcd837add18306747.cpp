#include <cstdio>
#include <iostream>
using namespace std;

int main () {
	int T;
	scanf ("%d", &T);
	while (T--) {
		int n;
		scanf("%d",&n);
		int banyak=0;
		int arr[n];
		for(int a=0;a<n;a++)
		{
			scanf("%d",&arr[a]);
			banyak+=arr[a];
		}
		if(banyak%3==0)
			printf("Yes");
		else
			printf("No");
	}
	return 0;
}
