#include<stdio.h>
using namespace std;

int main ()
{
	int t;
	scanf("%d",&t);
	for(int x=1;x<=t;x++)
	{
		int n;
		scanf("%d",&n);
		int banyak=0;
		long long arr[n];
		for(int a=0;a<n;a++)
		{
			scanf("%lld",&arr[a]);
			banyak+=arr[a]%3;
		}
		if(banyak%3==0)
			printf("Yes\n");
		else
			printf("No\n");
	}
	return 0;
}
